var url = 'http://myloggger.io/log';

function log(message){
    //send and http request
    console.log(message);
}

module.exports.log = log;