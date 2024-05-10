const express = require("express");
const cors = require("cors");

const app = express();

app.use(cors({
  origin: "http://localhost:8081",
}));

app.get("/secret", (req, res) => {
  return res.send(process.env.FLAG);
});

app.listen(3000);
