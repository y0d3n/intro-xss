const express = require("express");

const app = express();
app.set("view engine", "ejs");

app.get("/", (req, res) => {
  const name = req.query.name ?? "";
  res.cookie("session", process.env.FLAG);
  if (name !== "") {
    return res.send(`${name}さん、こんにちは👋`);
  }
  return res.render("index.ejs");
});

app.get("/secret", (req, res) => {
  return res.send(process.env.FLAG);
});

app.listen(3000);
