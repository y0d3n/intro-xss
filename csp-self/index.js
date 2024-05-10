const express = require("express");
const { expressCspHeader, SELF } = require("express-csp-header");

const app = express();
app.set("view engine", "ejs");

app.use(expressCspHeader({
  directives: {
    "script-src": [SELF],
  },
}));

app.get("/", (req, res) => {
  const name = req.query.name ?? "";
  if (name !== "") {
    return res.send(`${name}さん、こんにちは👋`);
  }
  return res.render("index.ejs");
});

app.listen(3000);
