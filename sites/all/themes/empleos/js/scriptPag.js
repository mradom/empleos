function e(a){return document.getElementById(a);}

//SLIDER HORIZONTAL ESPECIALES - Ajax Puntitos

var Dots=3;//Cantidad de paginas que posee el slider
var PosDot=1;//Variable que guarda la posicion del Dot
var Dots2=3;//Cantidad de paginas que posee el slider2
var PosDot2=1;//Variable que guarda la posicion del Dot2
var Dots3=2;
var PosDot3=1;



function ChangeDot(div){
	for(i=1;i<=Dots;i++){e('Dot'+i).className='';}
	if(div=='Ant'){
		if(PosDot==1){
			e('Dot'+Dots).className='NotAct';
			PosDot=Dots;
		}else{
			e('Dot'+(PosDot-1)).className='NotAct';
			PosDot--;
		}
	}else if(div=='Sig'){
		if(PosDot==3){
			e('Dot'+1).className='NotAct';
			PosDot=1;
		}else{
			e('Dot'+(PosDot+1)).className='NotAct';
			PosDot++;
		}
	}
}
function ChangeDot2(div){
	for(i=1;i<=Dots2;i++){e('2Dot'+i).className='';}
	if(div=='Ant'){
		if(PosDot2==1){
			e('2Dot'+Dots2).className='NotAct';
			PosDot2=Dots2;
		}else{
			e('2Dot'+(PosDot2-1)).className='NotAct';
			PosDot2--;
		}
	}else if(div=='Sig'){
		if(PosDot2==3){
			e('2Dot'+1).className='NotAct';
			PosDot2=1;
		}else{
			e('2Dot'+(PosDot2+1)).className='NotAct';
			PosDot2++;
		}
	}
}
function ChangeDot3(div){
	for(i=1;i<=Dots3;i++){e('3Dot'+i).className='';}
	if(div=='Ant'){
		if(PosDot3==1){
			e('3Dot'+Dots3).className='NotAct';
			PosDot3=Dots3;
		}else{
			e('3Dot'+(PosDot3-1)).className='NotAct';
			PosDot3--;
		}
	}else if(div=='Sig'){
		if(PosDot3==1){
			e('3Dot'+1).className='NotAct';
			PosDot3=1;
		}else{
			e('3Dot'+(PosDot3+1)).className='NotAct';
			PosDot3++;
		}
	}
}

/*SOLAPAS*/
function SolChange(div,div2,div3){
	for(i=1;i<=3;i++){e('S_Opi'+i).className='clearfix';}
	e(div2).className='Act clearfix';
	for(i=1;i<=3;i++){e('Opi'+i).style.display='none';}
	e(div).style.display='block';
}

/*ERROR*/
function Error(div){
	e(div).style.display='none';	
}
