import Search from './search.js';
import Validate from './validate.js';
import Alert from './alert.js';

let searchText = document.querySelector('.search-text');
let searchButton = document.querySelector('.search-button');
const message = "Please input a city to search.";

// add onlick event to search button
searchButton.addEventListener("click", search);

// add enter event to input search field
searchText.addEventListener("keypress", (event) => {

  if (event.key === "Enter") {

    event.preventDefault();

    search();

  }

});

function search() {
  if (!Validate.validateEmpty(searchText.value)) {

    Search.execute(searchText.value);

  } else {

    Alert.show(message);

  }
}