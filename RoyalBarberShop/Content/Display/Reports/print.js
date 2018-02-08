function PrintDoc() {
	var toPrint = document.getElementById('printarea');
	var popupWin = window.open('', '_blank', 'width=1200,height=650,location=no,left=20px');
	popupWin.document.open();
	popupWin.document.write(
		'<html><title>Rendez-vous de l&#39;année</title><link rel="stylesheet" type="text/css" href="print.css" />' +
		'<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>' +
		'</head>' + 
		'<body onload="window.print()">'
	)
	popupWin.document.write(toPrint.innerHTML);
	popupWin.document.write('</html>');
	popupWin.document.close();
}