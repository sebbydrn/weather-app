export default class Search {

  static execute(searchString) {

    window.location.replace(searchUrl.replace(':cityName', searchString));

  }

}