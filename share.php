<!DOCTYPE html>
<html>
<head>
	<title>stocks api </title>
<script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="apiselect.js"></script>
</head>
<body>

<button onclick="call()">click</button>	

<script type="text/javascript">
	
	function call()
	{
		let apikey=getApiKey2()[0];
		 $.get("https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol=TATASTEEL.BSE&outputsize=full&apikey="+apikey,function(data,status)
		  {
            //current stock data  stock api
		  //	$.get("https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=SAIL.BSE&apikey=ULACX5022WTRT3BR")
		  	//search api
           //$.get("https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=SAIC&apikey=ULACX5022WTRT3BR")
           //market open or close status
          // https://www.alphavantage.co/query?function=MARKET_STATUS&apikey=demo
			console.log(status);
			console.log(data);
		  });
	}	
</script>
</body>

</html>