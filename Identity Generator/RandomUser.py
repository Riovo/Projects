# Import the requests library to handle HTTP requests
import requests

# Send a GET request to the randomuser.me API
response = requests.get('https://randomuser.me/api')

# Extract the title, first and last name, gender, age, and date of birth from the JSON response
title = response.json()['results'][0]['name']['title']
first_name = response.json()['results'][0]['name']['first']
last_name = response.json()['results'][0]['name']['last']
gender = response.json()['results'][0]['gender']
age = response.json()['results'][0]['dob']['age']
dob = response.json()['results'][0]['dob']['date']

# Extract the phone number, email, username, and password from the JSON response
phone = response.json()['results'][0]['phone']
email = response.json()['results'][0]['email']
username = response.json()['results'][0]['login']['username']
password = response.json()['results'][0]['login']['password']

# Print the extracted personal information
print(f'{title}. {first_name} {last_name}, {gender}, Age: {age}, DOB: {dob}\n')
print(f'Email: {email}, Username: {username}, Password: {password}\n')
print(f'Phone number: {phone}')

# Extract the address components (street number, street name, city, state, country, postcode) from the JSON response
number = response.json()['results'][0]['location']['street']['number']
name_add = response.json()['results'][0]['location']['street']['name']
city = response.json()['results'][0]['location']['city']
state = response.json()['results'][0]['location']['state']
country = response.json()['results'][0]['location']['country']
postcode = response.json()['results'][0]['location']['postcode']

# Print the extracted address
print(f'Address = {number} {name_add}, City: {city}')
print(f'State: {state}, Postcode: {postcode}, Country: {country}\n')
