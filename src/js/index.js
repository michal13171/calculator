let equal = document.querySelector(`#calculate`);
let global = document.querySelectorAll(`.global`);
let deleteData = document.querySelector(`#del`);

for (let i = 0; i < global.length; i++) {
	global[i].addEventListener('click', function (event) {
		let result = document.querySelector('#result');
		const elem = event.target;
		const value = elem.value;
		
		elem.value = value.replace(/\D/, "");
		result.value += value;
		result.innerHTML += value;
	});
}

deleteData.addEventListener('click', function (event) {
	let result = document.querySelector('#result');
	let resultLabel = document.querySelector('#result-label');
	result.value = '';
	result.innerHTML = '';
	resultLabel.innerHTML = ''
});

equal.addEventListener('click', function (event) {
	let result = document.querySelector('#result');
	let resultLabel = document.querySelector('#result-label');
	let getHtml = result.innerHTML;
	let splitData;
	console.log(getHtml)
	
	switch (true) {
		case  getHtml.includes('+'):
			let getPlus = getHtml.split('+');
			splitData = Number(getPlus[0]) + Number(getPlus[1]);
			break
		case  getHtml.includes('-'):
			let getDistracted = getHtml.split('-');
			splitData = Number(getDistracted[0]) - Number(getDistracted[1]);
			break
		case  getHtml.includes('X'):
			let getMultiplication = getHtml.split('X');
			console.log(Number(getMultiplication[0]))
			splitData = Number(getMultiplication[0]) * Number(getMultiplication[1]);
			break
		case  getHtml.includes('÷'):
			let getDivision = getHtml.split('÷');
			
			splitData = Number(getDivision[0]) / Number(getDivision[1]);
			break
		default:
			result.value = '';
			getHtml = '';
	}
	
	resultLabel.innerHTML = splitData
});
