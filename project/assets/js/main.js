let cities = [
  "Mumbai",
  "Pune",
  "Nagpur",
  "Thane",
  "Nashik",
  "Aurangabad",
  "Solapur",
  "Kolhapur",
  "Amravati",
  "Akola",
  "Jalgaon",
  "Latur",
  "Sangli",
];

let citylist = document.querySelector(".city-list");
var citynames = document.querySelectorAll(".city-list li");

// Function to update the citynames NodeList
function updateCityNames() {
  citynames = document.querySelectorAll(".city-list li");
}

function updateCityList(cityArray) {
  citylist.innerHTML = "";
  cityArray.forEach((element) => {
    const listItem = document.createElement("li");
    listItem.textContent = element;
    listItem.addEventListener("click", function () {
      cityButton.value = listItem.textContent;
    });
    citylist.appendChild(listItem);
  });
  updateCityNames(); // Call the function to update citynames
}

cities.sort();
updateCityList(cities);

const cityButton = document.getElementById("city");
const selectWrapper = document.querySelector(".select-wrapper");

cityButton.addEventListener("input", function () {
  const input = cityButton.value.toLowerCase();
  const filteredCities = cities.filter((city) =>
    city.toLowerCase().includes(input)
  );
  filteredCities.sort(); // Sort the filtered cities
  updateCityList(filteredCities);
});

document.addEventListener("click", function (event) {
  if (event.target === selectWrapper || event.target === cityButton) {
    selectWrapper.classList.add("active");
    if (selectWrapper.classList.contains("error")) {
      selectWrapper.remove("error");
    }
  } else if (event.target !== cityButton) {
    selectWrapper.classList.remove("active");
  } else {
    selectWrapper.classList.remove("active");
  }
});

cityButton.addEventListener("focus", function () {
  selectWrapper.classList.add("active");
});
