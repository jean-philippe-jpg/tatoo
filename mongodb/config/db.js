
const mongoose = require('mongoose');
const dotenv  = require('dotenv');
dotenv.config();


const poolOptions = {
  maxPoolSize: 10, // Maximum number of connections in the pool
//const { connect } = require("mongoose");
}

/*const connectDB = async () => {
  try {
    //await mongoose.set('strictQuery', false);
    await mongoose.connect(process.env.MONGO_URI, 
      console.log('Connexion à MongoDB réussie'));
    
  } catch (error) {
    console.error('Erreur de connexion à MongoDB:', error);
  }
}*/
const connectDB = async () => {

  mongoose.connect('mongodb+srv://toto:toto@cluster0.s7d4ban.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0', {
  //useNewUrlParser: true,
  //useUnifiedTopology: true,
  ...poolOptions
})

  try {
    mongoose.connection
  .on('connected', function() {
    console.log('Mongoose connected to MongoDB');
  });

  } catch (error) {

    mongoose.connection
  .on('error', function(err) {

    console.error('Mongoose connection error:', err);
  })
  }

}

/*const { MongoClient, ServerApiVersion } = require('mongodb');
const uri = "mongodb+srv://toto:toto@cluster0.s7d4ban.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";

// Create a MongoClient with a MongoClientOptions object to set the Stable API version
const client = new MongoClient(uri, {
  serverApi: {
    version: ServerApiVersion.v1,
    strict: true,
    deprecationErrors: true,
  }
});

async function run() {
  try {
    // Connect the client to the server	(optional starting in v4.7)
    await client.connect();
    // Send a ping to confirm a successful connection
    await client.db("admin").command({ ping: 1 });
    console.log("Pinged your deployment. You successfully connected to MongoDB!");
  } finally {
    // Ensures that the client will close when you finish/error
    await client.close();
  }
}
run().catch(console.dir);*/


module.exports = connectDB;