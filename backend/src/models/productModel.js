const mongoose = require("../db/mongoose");


const productSchema = new mongoose.Schema(
    {
        user: {
            type: mongoose.Schema.ObjectId,
            required: [true, 'A post must have an id'],
        },
        product: {
            type: String,
            unique: true,
            required: [true, "A user must have a product"],
            trim: true,
        },
        amount: {
            type: Number,
            required: [true, "A user must have a Date of Birth"],
        },
        DOP: {
            type: String,
            required: [true, "A user must have a telephone number"],
        },

    },
    {
        timestamps: true,
    }
);



const Product = mongoose.model("Product", productSchema);

module.exports = Product;
