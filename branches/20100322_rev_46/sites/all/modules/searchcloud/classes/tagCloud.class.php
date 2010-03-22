<?php
/**
 * This class generates a Web 2.0 Tag cloud with various sizes, colors and fonts.
 *
 * @author Teo Rusu, 31.jul.2008
 * @version 1.3
 * 
 */
class tagCloud {
	// vars:
	private $_aTerms = array();
	private $_aTermsCounts = array();
	private $_iMinFontSize;
	private $_iMaxFontSize;
	private $_iMinCount;
	private $_iMaxCount;
	private $_sFinalHtmlCloud;
	private $_iMinimumTagLength;
	private $_iUnderlineLinks;
	private $_iUseColors;
	private $_iUseLightColors;
	private $_aLightColors = array();
	private $_aDarkColors = array();
	private $_aIgnoredWords = array();
	private $_aIgnoredChars = array();
	public  $options = array();
	// constructor:
	public function tagCloud() {
		// set defaults:
		$this->options['minimum_tag_length'] = 3;
		$this->options['underline_links'] = 0;
		$this->options['use_colors'] = 1;
		$this->options['use_light_colors'] = 0;
		$this->options['min_font_size'] = 14;
		$this->options['max_font_size'] = 24;
		$this->options['light_colors'] = "#00FFFF,#F0F8FF,#FFF0F5,#FFE4B5,#EEE8AA,#98FB98,#B0C4DE,#FF00FF,#0000CD,#FDF5E6";
		$this->options['dark_colors'] = "#0000FF,#FF0000,#00008B,#A52A2A,#FF00FF,#008000,#C71585,#8B4513,#008080,#2F4F4F";
		$this->options['ignored_words'] = "?,of,the,is,off,you,them,then,at,with,i,it,We,we";
		$this->options['ignored_chars'] = "?,!,.,~,@,#,$,%,^,&,*,(,),-,_,+,=,<,>,/,[,],{,},:,;,~,`";
	}
	// load terms:
	public function loadTerms($aTerms) {
		foreach ($aTerms as $term) {
			$this->_aTerms[] = array (
			'term'=>trim($term['term']),
			'link'=>trim($term['link']),
			'count'=>(int)trim($term['count'])
			);
			// add to counts:
			$this->_aTermsCounts[] = (int)trim($term['count']);
		}
	}
	// process options:
	private function _processOptions() {
		$this->_iMinimumTagLength = (int)$this->options['minimum_tag_length'];
		$this->_iUnderlineLinks = (int)$this->options['underline_links'];
		$this->_iUseLightColors = (int)$this->options['use_light_colors'];
		$this->_iMinFontSize = (int)$this->options['min_font_size'];
		$this->_iMaxFontSize = (int)$this->options['max_font_size'];
		$this->_iUseColors = (int)$this->options['use_colors'];
		$this->_aLightColors = explode(",", $this->options['light_colors']);
		$this->_aLightColors = array_map("trim", $this->_aLightColors);
		$this->_aDarkColors = explode(",", $this->options['dark_colors']);
		$this->_aDarkColors = array_map("trim", $this->_aDarkColors);
		$this->_aIgnoredWords = explode(",", $this->options['ignored_words']);
		$this->_aIgnoredWords = array_map("trim", $this->_aIgnoredWords);
		$this->_aIgnoredChars = explode(",", $this->options['ignored_chars']);
		$this->_aIgnoredChars = array_map("trim", $this->_aIgnoredChars);
		// internally ignore commas & quotes:
		$this->_aIgnoredChars[] = ',';
		$this->_aIgnoredChars[] = "'";
		$this->_aIgnoredChars[] = '"';
	}
	// process terms:
	private function _processTerms() {
		// strip words & chars from the terms:
		$aNewTerms = array();
		foreach ($this->_aTerms as $term) {
			// check minimum tag length & ignored words:
			if ( !in_array($term['term'], $this->_aIgnoredWords) && strlen($term['term'])>=$this->_iMinimumTagLength ) {
				// now strip ignored chars:
				$aNewTerms[] = array (
				'term'=>str_replace($this->_aIgnoredChars, '', $term['term']),
				'link'=>$term['link'],
				'count'=>$term['count']
				);
			}
		}
		// replace with the new array:
		$this->_aTerms = $aNewTerms;
		// set limits:
		sort($this->_aTermsCounts, SORT_NUMERIC);
		$this->_iMinCount = $this->_aTermsCounts[0];
		$this->_iMaxCount = $this->_aTermsCounts[count($this->_aTermsCounts)-1];
		// apply the formula for each term:
		for ($i=0; $i<count($this->_aTerms); $i++) {
			if (count($this->_aTerms) > 1) {
				$this->_aTerms[$i]['font_size'] = intval(((($this->_aTerms[$i]['count']-$this->_iMinCount)*($this->_iMaxFontSize-$this->_iMinFontSize))/($this->_iMaxCount-$this->_iMinCount))+$this->_iMinFontSize);
			}
			else {
				$this->_aTerms[$i]['font_size'] = $this->_iMinFontSize;
			}
		}
	}
	//compute cloud html string:
	private function _processCloud() {
		$sCloudHtml = "";
		foreach ($this->_aTerms as $term) {
			// colors:
			$sColors = "";
			if ($this->_iUseColors==1) {
				if ($this->_iUseLightColors==1) {
					$sColors = "color:".$this->_aLightColors[$term['font_size']-$this->_iMinFontSize]."; ";
				}
				else {
					$sColors = "color:".$this->_aDarkColors[$term['font_size']-$this->_iMinFontSize]."; ";
				}
			}
			$sCloudHtml .= "<span>";
			$sCloudHtml .= '<a href="'.$term['link'].'" title="'.$term['term'].'" style="';
			$sCloudHtml .= "font-size:".$term['font_size']."px; ";
			$sCloudHtml .= $sColors;
			$sCloudHtml .= "text-decoration:".(($this->_iUnderlineLinks==1)?"underline":"none").";";
			$sCloudHtml .= '">';
			$sCloudHtml .= $term['term'];
			$sCloudHtml .= "</a>";
			$sCloudHtml .= "</span> ";
		}
		$this->_sFinalHtmlCloud = trim($sCloudHtml);
	}
	// return tag cloud html string:
	public function getCloud() {
		$this->_processOptions();
		$this->_processTerms();
		$this->_processCloud();
		//return "<pre>".print_r($this->_aTerms, true)."</pre>";
		return $this->_sFinalHtmlCloud;
		//return "soon...";
	}
}
?>