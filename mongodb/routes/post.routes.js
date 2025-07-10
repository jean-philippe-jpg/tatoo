
const express = require('express');
const router = express.Router();

router.get("/", (req, res) => {
  res.json({message:"Hello, this is a test message from the server!"});
});

router.post("/", (req, res) => {
    console.log(req.body);
  res.json({ message: req.body.toto });
});

router.put("/:id", (req, res) => {
   
  res.json({ messageid: req.params.id });
});

router.delete("/:id", (req, res) => {
   
  res.json({ messageid: "post suprimé de l'id " + req.params.id });
});

router.patch("/poste-like/:id", (req, res) => {
   
  res.json({ messageid: "post liké de l'id " + req.params.id });
});

router.patch("/dislike/:id", (req, res) => {
   
  res.json({ messageid: "post disliké de l'id " + req.params.id });
});


module.exports = router

