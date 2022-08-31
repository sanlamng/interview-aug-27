const jwt = require('jsonwebtoken');
const User = require('../models/userModel');

const auth = async (req, res, next) => {

    try {
        const token = req.header('Authorization').replace('Bearer ', '');

        const decoded = jwt.verify(token, process.env.SECRET);

        // console.log(token);

        const user = await User.findOne({ _id: decoded._id, 'tokens.token': token });

        // console.log(user);

        if (!user) throw new Error();

        req.user = user;
        req.token = token;

        // console.log(req.token);
        next();

    } catch (e) {
        res.status(401).send({ error: 'user not authenticated' })
    }
}

module.exports = auth;