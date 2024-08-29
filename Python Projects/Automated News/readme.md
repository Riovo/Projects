# News Article Fetcher

This script uses the NewsAPI to fetch top headlines based on a specified category or a search query. It is designed to allow users to quickly access news articles.

## Getting Started

To use this script, you need to have an API key from NewsAPI. 

1. Create an account at [NewsAPI](https://newsapi.org/).
2. Retrieve your API key.
3. Replace `ENTER API KEY` in the script with your own API key. Keep your API key confidential.

## Prerequisites

Ensure you have Python installed on your machine along with the `requests` library. If you don't have the `requests` library, install it using pip:

"pip install requests"

## Usage

The script can be executed with either a category or a search query as an argument.

### Running the Script

Use the following format to run the script:

python news_getter.py <category / query>

For example:

python news_getter.py "business"

python news_getter.py "Cristiano Ronaldo"

The script will output the titles and URLs of the top news articles related to the provided category or query.

## Important Notes

- The script is intended for educational or personal use. Make sure you adhere to NewsAPI's terms of service, especially regarding the usage of the API and the distribution of the content.
- The script's default settings limit the search to specific regions (Ireland and Great Britain). Modify these as needed in the script.

## License

This script is released under an open-source license. Use it at your own risk.