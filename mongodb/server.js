
const express = require('express');
const connect = require('./config/db');
//const client = require('./config/db');


const port = 5000;

//connexion à la base de données
connect();
const app = express();


//middelware permetant de traiter les données de ma requète

app.use(express.json());
app.use(express.urlencoded({ extended: false }));

app.use("/post", require("./routes/post.routes"));




//lancement du server
app.listen(port, () => {
  console.log('Server is running on port' + port);
});