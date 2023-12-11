# Import necessary libraries
import requests
from sys import argv

# Define the API key and the base URLs for weather and geocoding services
API_KEY = "ENTER API KEY"

URL_WEATHER = "https://api.openweathermap.org/data/2.5/weather"
URL_GEOCODING = "http://api.openweathermap.org/geo/1.0/direct"


# Define a class for location-related operations
class Location:
    @staticmethod
    def get_coords(location):
        # Set up parameters for geocoding API request
        params = {
            "q": location,
            "limit": 1,
            "appid": API_KEY
        }
        # Make a request to the geocoding API
        response = requests.get(URL_GEOCODING, params=params)
        data = response.json()
        # Return latitude and longitude if available
        if data:
            return data[0]['lat'], data[0]['lon']
        else:
            return None, None


# Define a class for weather-related operations
class Weather:
    @staticmethod
    def get_weather(latitude, longitude):
        # Set up parameters for weather API request
        params = {
            "lat": latitude,
            "lon": longitude,
            "appid": API_KEY,
            "units": "metric"
        }
        # Make a request to the weather API
        response = requests.get(URL_WEATHER, params=params)
        return response.json()


# Main execution block
if __name__ == "__main__":
    # Check if country argument is provided
    if len(argv) < 2:
        print("Usage: python script.py <country>")
        exit(1)

    # Retrieve country name from command line arguments
    country = argv[1]
    print(f"Getting weather for {country}....\n")

    # Get coordinates for the specified country
    lat, lon = Location.get_coords(country)
    if lat is not None and lon is not None:
        # Fetch weather information for the given coordinates
        weather_info = Weather.get_weather(lat, lon)

        # Extract relevant information from the response
        temperature = weather_info['main']['temp']
        weather_description = weather_info['weather'][0]['description']
        humidity = weather_info['main']['humidity']
        wind_speed = weather_info['wind']['speed']

        # Format and display the weather information
        print(f"Weather for {country}:\n")
        print(f"Temperature: {temperature} °C")
        print(f"Weather: {weather_description.title()}")
        print(f"Humidity: {humidity}%")
        print(f"Wind Speed: {wind_speed} km/h\n")
        print("Successfully retrieved weather information.")
    else:
        print("Could not find the specified country.")
