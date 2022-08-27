const dbOperation = require("../dbFiles/dbOperation");

const getProducts = async (req, res) => {
  const result = await dbOperation.getProducts();
  res.json({ name: result.recordset });
};

module.exports = {
  getProducts,
};
