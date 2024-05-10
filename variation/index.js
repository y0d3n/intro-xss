const express = require("express");

const app = express();
app.set("view engine", "ejs");

app.get("/", (req, res) => {
  return res.render("index.ejs");
});

app.get("/url", (req, res) => {
  const url = req.query.url;
  return res.render("url.ejs", { url });
});

app.get("/attr", (req, res) => {
  const attr = req.query.attr;
  return res.render("attr.ejs", { attr });
});

app.get("/js", (req, res) => {
  const name = req.query.name;
  return res.render("js.ejs", { name });
});

app.get("/dom", (req, res) => {
  return res.render("dom.ejs");
});

app.listen(3000);
