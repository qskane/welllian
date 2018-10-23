const development = {
  api: 'http://malllian-dev.com'
};
const production = {
  api: 'https://welllian.com'
};


module.exports = process.env.NODE_ENV === 'production' ? production : development;
