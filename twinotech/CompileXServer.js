var express = require('express');
var path = require('path');
var app = express();
var bodyParser = require('body-parser');
app.use(bodyParser());


//compileX
var compiler = require('compilex');
var option = {stats : true};
var cors = require('cors')

compiler.init(option);

app.use(cors());

app.post('/compilecode' , function (req , res ) {
    
/*    var values=[];
    values = req.body.arr;
    var code = values.getElementById(code);
    var input = values.getElementById(input);
    var inputRadio = values.getElementById(inputRadio);
    var filename = values.getElementById(filename);*/
	var code = req.body.code;	
	var input = req.body.input;
    var inputRadio = req.body.inputRadio;
    var filename=req.body.fileName;
    filename = filename.substr(0, filename.length-1);
    //var filename = "x";
    var lang = req.body.lang;
         
    if(inputRadio === "true")
        {    
        	var envData = { OS : "windows" , cmd : "g++"};	   	
        	compiler.compileCPPWithInput(envData , code ,input ,filename , function (data) {
        		if(data.error)
        		{
                    res.send(data.error);
        		}
        		else
        		{
                    res.send(data.output);
        		}
        	});
	   }
	   else
	   {
	   	
	   	var envData = { OS : "windows" , cmd : "g++"};	   
        	compiler.compileCPP(envData , code ,filename , function (data) {
        	if(data.error)
        	{
        		res.send(data.error);
        	}    	
        	else
        	{
        		res.send(data.output);
        	}
    
            });
	   }
    
});

app.get('/fullStat' , function(req , res ){
    compiler.fullStat(function(data){
        res.send(data);
    });
});

app.listen(8080);
