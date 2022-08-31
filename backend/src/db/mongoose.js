const mongoose = require('mongoose');
let server = process.env.MONGODB_URI_LOCAL
if (process.env.ENV === "prod") {
    server = process.env.MONGODB_URI_PROD
} 

mongoose.connect(server, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
    // useCreateIndex:true
})

module.exports = mongoose;