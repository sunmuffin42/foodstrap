var quotes = ["Mouse Over any of the images to find out an interesting food fact!","Protein is one of the most powerful nutrients you can eat as it will help you stay focused and energized throughout the day.",
"Potassium supports skeletal and cardiovascular health. However, only 2% of people eat enough potassium everyday." , "Both types of meats have health benefits. White meat is a much leaner source of protein while red meats are much higher in B vitamins and iron while also being higher in detrimental fats.",
"Alcohol can lead to cardiovascular,liver issues ,and gastrointestinal issues over time when consumed in excess. However, in moderation, some forms of alcohol contain health benefits.",
"A common misconception is that iron is obtained mainly through meat. In fact ,you can obtain most dietary iron through leafy greens" , 
"One effect of eating too many carbs is mental fog, in addition to weight gain. Both of these are bad for college students so be sure to avoid this!",
"It is extremely easy to consume too much salt in a college diet, which is an issue since it can dehydrate you and lead to longer term health issues.",
"Contrary to popular belief, fast food is actually more expensive, last much shorter of a time and, is worse for you than preparing your own food"
]

function facts(idx) {
	var fac = document.getElementById('facts');
	fac.value = quotes[idx];
}