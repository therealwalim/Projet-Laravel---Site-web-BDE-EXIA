var mysql = require('mysql');
 
var fs = require('fs');
var csv = require('fast-csv');
var ws = fs.createWriteStream('my.csv');
 
var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "nodedb"
});
 
con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  con.query("CREATE DATABASE IF NOT EXISTS nodedb", function (err, result) {
    if (err) throw err;
    console.log("Database created");
  });
});
 
var jwt = require('jsonwebtoken');
var express = require('express'); 
// Nous définissons ici les paramètres du serveur.
var hostname = 'localhost'; 
var port = 3000; 
  
// Nous créons un objet de type Express. 
var app = express(); 
var bodyParser = require("body-parser"); 
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json()); 
//Afin de faciliter le routage (les URL que nous souhaitons prendre en charge dans notre API), nous créons un objet Router.
//C'est à partir de cet objet myRouter, que nous allons implémenter les méthodes. 
var myRouter = express.Router(); 
  
// Je vous rappelle notre route (/piscines).  
myRouter.route('/bde')
// J'implémente les méthodes GET, PUT, UPDATE et DELETE
// GET
.get(function(req,res){ 
  
  res.json({message : "edcwsx", methode : req.method})
 
})
 
//POST
 
.post(function(req,res){
const token =  jwt.sign( {nom : req.body.nom}, "my_secret_key"); 
 
//res.json({message : "Ajoute un nouvel élève à la liste", campus : req.body.campus,mdp : req.body.mdp, methode : req.method, nom : req.body.nom, prenom = req.body.prenom});
res.json({token : token});
 
    con.query("INSERT INTO eleves (Nom, Prenom, Campus, MDP) VALUES (" + "'" + req.body.nom +"'" + "," + "'" + req.body.prenom +"'" + "," + "'" + req.body.campus + "'"  + "," + "'" + req.body.mdp + "'" + ");", function (err, result) {
      if (err) throw err;
      console.log("inserted");
    });
  
 
})
 
app.use(myRouter); 
 
myRouter.route('/bde/:eleve_id')
.get(ensureToken, function(req,res){ 
  jwt.verify(req.token, 'my_secret_key', function(err,data)
  {
    if (err) {
      res.sendStatus(403);
    } else {
     con.query("select * from eleves where id ="+ req.body.eleve_id, function (err, result) {
      if (err) throw err;
      console.log("gotcha");
    });
    res.json({nom : result[eleve_id.nom]});
 
 
 
      csv.write([
        [req.body.eleve_id, req.body.eleve_id]
 
      ], {headers:true}).pipe(ws);
    }
  })
})
 
 
 
.put(function(req,res){ 
      res.json({message : "Vous souhaitez modifier les informations de l'user n°" + req.params.eleve_id});
})
 
 
app.use(myRouter);
 
myRouter.route('/bde/:eleve_id/:eleve_mdp')
 
.put(function(req,res){ 
      res.json({message : "Vous souhaitez modifier les informations de l'user n°" + req.params.eleve_id, mdp : req.params.eleve_mdp});
})
 
function ensureToken(req, res, next) {
  const bearerHeader = req.headers["authorization"];
  if (typeof bearerHeader !== 'undefined') {
    const bearer = bearerHeader.split(" ");
    const bearerToken = bearer[1];
    req.token = bearerToken;
    next();
  } else {
    res.sendStatus(403);
  }}
app.use(myRouter);
 
// Démarrer le serveur 
app.listen(port, hostname, function(){
    console.log("Mon serveur fonctionne sur http://"+ hostname +":"+port); 
});
