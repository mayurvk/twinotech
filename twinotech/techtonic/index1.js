var express = require('express') , app = express();
var compiler = require('compilex');
app.post('/compile' , function( req , res ) { 
	var envData = { OS : "windows" , cmd : "g++"}; 
	compiler.compileCPP(envData , code , function (data) {
	        res.send(data);
	        //data.error = error message  
	        //data.output = output value 
	});
});