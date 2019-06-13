const filterFn = require('./mod_filter.js')
const dir = process.argv[2]
const filterStr = process.argv[3]

filterFn(dir, filterStr, function (err, list) {
  if (err) {
    return console.error('There was an error:', err)
  }

  list.forEach(function (file) {
    console.log(file)
  })
})

//Contract
//   1. Export a single function that takes exactly the arguments described.
//   2. Call the callback exactly once with an error or some data as described.
//   3. Don't change anything else, like global variables or stdout.
//   4. Handle all the errors that may occur and pass them to the callback.