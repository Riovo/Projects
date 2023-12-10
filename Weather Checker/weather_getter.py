import requests
from sys import argv

API_KEY = "ENTER API KEY"

URL_WEATHER = "https://api.openweathermap.org/data/2.5/weather"

URL_GEOCODING = "http://api.openweathermap.org/geo/1.0/direct"

class Location:
    @staticmethod
    def get_coords(country):
        params = {
            "q": country,
            "limit": 1,
            "appid": API_KEY
        }
        response = requests.get(URL_GEOCODING, params=params)
        data = response.json()
        if data:
            return data[0]['lat'], data[0]['lon']
        else:
            return None, None

class Weather:
    @staticmethod
    def get_weather(lat, lon):
        params = {
            "lat": lat,
            "lon": lon,
            "appid": API_KEY,
            "units": "metric"
        }
        response = requests.get(URL_WEATHER, params=params)
        return response.json()

if __name__ == "__main__":
    if len(argv) < 2:
        print("Usage: python script.py <country>")
        exit(1)

    country = argv[1]
    print(f"Getting weather for {country}....\n")

    lat, lon = Location.get_coords(country)
    if lat is not None and lon is not None:
        weather_info = Weather.get_weather(lat, lon)

        # Extracting relevant information
        temperature = weather_info['main']['temp']
        weather_description = weather_info['weather'][0]['description']
        humidity = weather_info['main']['humidity']
        wind_speed = weather_info['wind']['speed']

        # Formatting the output
        print(f"Weather for {country}:\n")
        print(f"Temperature: {temperature} °C")
        print(f"Weather: {weather_description.title()}")
        print(f"Humidity: {humidity}%")
        print(f"Wind Speed: {wind_speed} km/h\n")
        print("Successfully retrieved weather information.")
    else:
        print("Could not find the specified country.")