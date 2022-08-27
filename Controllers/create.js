const dbOperation = require("../dbFiles/dbOperation");

const createProduct = async (req, res) => {
  await dbOperation.createProduct(req.body);
  res.json({ code: 1, msg: "success" });
};

const createUserValidation = async (req, res) => {
  await dbOperation.createUserValidation(req.body);
  res.json({ code: 1, msg: "success" });
};
module.exports = {
  createUserValidation,
  createProduct,
};
