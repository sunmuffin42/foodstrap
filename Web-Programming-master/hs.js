window.onload = slide();
		function slide() {
			var im = document.getElementById("food");
			var idx = 0;
			var setnum = Math.floor(Math.random() * 3);
      var int;
			if (setnum == 0){
				var health = ["./img/health1.jpg" ,  "./img/health2.jpg" ,"./img/health3.jpg" ,"./img/health4.jpg" ,"./img/health5.jpg" ,"./img/health6.jpg" , "./img/health7.jpg" , "./img/health8.jpg" ];
				var hlen = health.length;
				 int = 4000;
			setInterval(showh , int);

			} else if (setnum == 1) {
				var nothealth = ["./img/nothealth1.jpg" ,  "./img/nothealth2.jpg" ,"./img/nothealth3.jpg" ,"./img/nothealth4.jpg" ,"./img/nothealth5.jpg" ,"./img/nothealth6.jpg" , "./img/nothealth7.jpg"];
				var nlen = nothealth.length;
				setInterval(shown , int);

			}else {
				var balance = ["./img/balance1.jpg" ,  "./img/balance2.jpg" ,"./img/balance3.jpg" ,"./img/balance4.jpg" ,"./img/balance5.jpg" ,"./img/balance6.jpg" ];
				var blen = balance.length;
				setInterval(showb , int);
			}
      function shown(){
					idx = idx + 1;
					im.src = nothealth[ idx % nlen];
				}
      function showh(){
				idx = idx + 1;
				im.src = health[ idx % hlen];
			}
      function showb(){
					idx = idx + 1;
					im.src = balance[ idx % blen];
				}
		}