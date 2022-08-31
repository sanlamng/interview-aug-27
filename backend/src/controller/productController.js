const Product = require("../models/productModel");

exports.getAll = async (req, res) => {
    const { id } = req.params
    try {
        const product = await Product.find({ user: id })

        res.status(201).send({ product });
    } catch (e) {
        res.status(400).send(e);
    }
};

exports.create = async (req, res) => {
    try {
        const product = new Product({ ...req.body });
        await product.save();
        res.status(201).send({ product });
    } catch (e) {
        res.status(400).send(e);
    }
};