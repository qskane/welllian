const development = {
  domain: 'malllian-dev.com'
};
const production = {
  domain: 'welllian.com'
};


module.exports = process.env.NODE_ENV === 'production' ? production : development;
