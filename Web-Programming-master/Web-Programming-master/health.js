function slide(){
	im = document.getElementById("im");
	idx = 0;
	health = ["./img/health1.jpg" ,  "./img/health2.jpg" ,"./img/health3.jpg" ,"./img/health4.jpg" ,"./img/health5.jpg" ,"./img/health6.jpg" , "./img/health7.jpg" , "./img/health8.jpg" , "./img/nothealth1.jpg" ,  "./img/nothealth2.jpg" ,"./img/nothealth3.jpg" ,"./img/nothealth4.jpg" ,"./img/nothealth5.jpg" ,"./img/nothealth6.jpg" , "./img/nothealth7.jpg" , "./img/balance1.jpg" ,  "./img/balance2.jpg" ,"./img/balance3.jpg" ,"./img/balance4.jpg" ,"./img/balance5.jpg" ,"./img/balance6.jpg" ];
	hlen = health.length;
	dur = 2000;
	function show(){
		idx = idx + 1;
		document.getElementById("im").src = health[idx % hlen];
	}
	setInterval( show , dur);
}

window.onload = slide();
