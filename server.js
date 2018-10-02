const express = require('express')
const path = require('path')
var app = express();

app.use(express.static(path.resolve(__dirname)));

app.get('/',(req,res)=>{
    res.sendFile('index.html');
})




var port = 3000;
app.listen(port,function(){
    console.log(`Server up on port ${port}`)
})