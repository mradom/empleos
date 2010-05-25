function e(a){return document.getElementById(a);}

//SLIDER HORIZONTAL ESPECIALES - Ajax Puntitos

var aDots=3;//Cantidad de paginas que posee el slider
var PosDot=1;//Variable que guarda la posicion del Dot
var aDots2=3;//Cantidad de paginas que posee el slider2
var PosDot2=1;//Variable que guarda la posicion del Dot2
var aDots3=2;
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
		if(PosDot==Dots){
			e('Dot'+1).className='NotAct';
			PosDot=1;
		}else{
			e('Dot'+(PosDot+1)).className='NotAct';
			PosDot++;
		}
	}
}
function ChangeDot2(div){
	for(i=1;i<=Dots2;i++){e('bDot'+i).className='';}
	if(div=='Ant'){
		if(PosDot2==1){
			e('bDot'+Dots2).className='NotAct';
			PosDot2=Dots2;
		}else{
			e('bDot'+(PosDot2-1)).className='NotAct';
			PosDot2--;
		}
	}else if(div=='Sig'){
		if(PosDot2==Dots2){
			e('bDot'+1).className='NotAct';
			PosDot2=1;
		}else{
			e('bDot'+(PosDot2+1)).className='NotAct';
			PosDot2++;
		}
	}
}
function ChangeDot3(div){
	for(i=1;i<=Dots3;i++){e('cDot'+i).className='';}
	if(div=='Ant'){
		if(PosDot3==1){
			e('cDot'+Dots3).className='NotAct';
			PosDot3=Dots3;
		}else{
			e('cDot'+(PosDot3-1)).className='NotAct';
			PosDot3--;
		}
	}else if(div=='Sig'){
		if(PosDot3==Dots3){
			e('cDot'+1).className='NotAct';
			PosDot3=1;
		}else{
			e('cDot'+(PosDot3+1)).className='NotAct';
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
