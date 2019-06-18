var express = require("express");
var app = express();

app.use(express.static("public"));

app.set("views", "views");
app.set("view engine", "ejs");

app.get("/", function(req, res){
    console.log("Received a request for /");
    res.write("This is the root");
    res.end();
});

app.get("/home", function (req, res) {
    console.log("Received a request for the home page");
    var name = getLoggedInUser();
    var email = "bill@email.com";
    var params = {username: name, email: email}; 
    res.render("home", params);
});

app.get("/list", function (req, res) {
    console.log("Received a request for the list page");
    var drinks = [
        { name: 'Water', gas: 0 },
        { name: 'Rootbeer', gas: 5 },
        { name: 'Milk', gas: 2 }
    ];
    var tagline = "Some drinks can give  you gas."
    
    res.render("list", {
        drinks: drinks,
        tagline: tagline
    });
});

app.listen(5000, function(){
        console.log("The server is up and listening on port 5000")
    });

function getLoggedInUser(){
    return "Bill";
}
