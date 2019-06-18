var http = require('http');
var url = require('url');
var numbers = require('./numbers');

function onRequest(req, res){
var parsed = url.parse(req.url, true);
    if (req.url === '/home'){
        res.writeHead(200,{"Content-Type": "text/html"});
        res.write('<h1>Welcome to the Home Page</h1>');
        res.end(); 
    }
    else if (req.url === '/getData'){
        res.writeHead(200,{"Content-Type": "application/json"});
        res.write(JSON.stringify({"name" : "Shannon Polfer", "class" : "cs313"}));
        res.end();
    }
    else if (req.url === '/getNumbers'){
        res.writeHead(200,{"Content-Type": "text/html"});
        res.write(numbers.counter(['Morgan', 'Shannon', 'Bill', 'Stevie']) + '<br>');
        res.write(numbers.adder(8,4) + '<br>');
        res.write(numbers.adder(numbers.pi, 57));
        res.end();
    }
    else {
        res.writeHead(404,{"Content-Type": "text/html"});
        res.write('<h1>Page Not Found</h1>');
        res.end();
    }
    console.log(parsed);
}

const server = http.createServer(onRequest);



server.listen(8888);

console.log('Listening on port 8888...');

