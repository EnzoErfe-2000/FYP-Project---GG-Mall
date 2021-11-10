window.onload = function(){
	document.getElementById("download")
	.addEventListener("click", () => {
		const report = this.document.getElementById("report");
		const type = this.document.getElementById("reportType").innerHTML;
		const month = this.document.getElementById("dropdownMenuButtonMonth").innerHTML.replace(/^\s+|\s+$/gm,'');
		const year = this.document.getElementById("dropdownMenuButtonYear").innerHTML.replace(/^\s+|\s+$/gm,'');
		console.log(report);
		console.log(window);
		var strName = type + '_' + month + '_' + year +'.pdf';
		const setOptions = {
			filename: strName,
			pagebreak: { mode: ['css', 'avoid-all'], after: '.break-page' }
		};
		html2pdf().set(setOptions).from(report).save();
	})
}