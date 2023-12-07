import requests
from sys import argv

API_KEY = "Enter Your API KEY"

URL = ('https://newsapi.org/v2/top-headlines?')

def get_articles_by_category(category):
    query_parameters = {
        "Category": category,
        "sortBy": "top",
        "country": "gb",
        "apiKey": API_KEY
    }
    return _get_articles(query_parameters)

def get_articles_by_query(query):
    query_parameters = {
        "q": query,
        "sortBy": "top",
        "country": "gb",
        "apiKey": API_KEY
    }
    return _get_articles(query_parameters)

def _get_articles(params):
    
    # this requests at the url with the specified parameters
    response = requests.get(URL, params=params)

    # This is to access the response.
    articles = response.json()['articles']

    # empty array of results.
    results = []

    # for loop through all the articles
    for article in articles:
        # This appends an object to the empty array.
        # Title key from the article object and url field.
        # We know its formatted like this due to the response in the documentation
        results.append({"title": article["title"], "url": article["url"]})

    for result in results:
        print(result['title'])
        print(result['url'])
        print('')

if __name__ == "__main__":
    if len(argv) < 2:
        print("Usage: py news_getter.py <category or query>")
        exit(1)

    category_or_query = argv[1]
    print(f"Getting news for {category_or_query}....\n")
    
    if " " in category_or_query:  # Check if it's a query or category
        get_articles_by_query(category_or_query)
    else:
        get_articles_by_category(category_or_query)
    
    print(f"Successfully retrieved top {category_or_query} headlines")