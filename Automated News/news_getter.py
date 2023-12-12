# Import necessary libraries
import requests
from sys import argv

# API Key for NewsAPI (replace with your actual API key)
API_KEY = "fbeb79b904ca43cc83b86a13698f92b9"

# URL for the NewsAPI's 'everything' endpoint
URL = ('https://newsapi.org/v2/everything?')


# Function to get articles by category
def get_articles_by_category(category):
    # Setting up the query parameters for the API request
    query_parameters = {
        "category": category,  # Category of news
        "sortBy": "top",       # Sorting by top news
        "apiKey": API_KEY,     # API key for authentication
        "language": "en"
    }
    # Calling the helper function to make the API request
    return _get_articles(query_parameters)


# Function to get articles by a search query
def get_articles_by_query(query):
    # Setting up the query parameters for the API request
    query_parameters = {
        "q": query,         # Search query
        "sortBy": "top",    # Sorting by top news
        "apiKey": API_KEY,  # API key for authentication
        "language": "en"
    }
    # Calling the helper function to make the API request
    return _get_articles(query_parameters)


# Helper function to make the API request and process the response
def _get_articles(params):
    try:
        # Making the GET request to the API
        response = requests.get(URL, params=params)
        # Raising an exception for HTTP errors
        response.raise_for_status()
        # Parsing the JSON response
        json_response = response.json()
        # Extracting the 'articles' field from the response
        articles = json_response.get('articles', [])

        # List comprehension to create a list of articles, filtering out any with '[Removed]' title
        results = [{"title": article["title"], "url": article["url"]} for article in articles if
                   article["title"] != '[Removed]']

        # Check if the results list is empty
        if not results:
            print("No articles found.")
            return

        # Printing the article titles and URLs
        for result in results:
            print(result['title'])
            print(result['url'])
            print('')

    except requests.RequestException as e:
        # Printing any exceptions caught during the API request
        print(f"Error fetching articles: {e}")


# Main execution block
if __name__ == "__main__":
    # Check if enough arguments are provided
    if len(argv) < 2:
        print("Usage: py news_getter.py <category or query>")
        exit(1)

    # Extracting the category or query from the command line arguments
    category_or_query = argv[1]
    print(f"Getting news for {category_or_query}....\n")
    # Determining whether to treat the input as a category or a query
    if " " in category_or_query:  # Check if it's a query or category
        get_articles_by_query(category_or_query)
    else:
        get_articles_by_category(category_or_query)

    # Indicate successful retrieval of articles
    print(f"Successfully retrieved top {category_or_query} headlines")
