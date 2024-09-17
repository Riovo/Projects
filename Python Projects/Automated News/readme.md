# News Fetcher Application

This is a simple news fetcher GUI application built using Python and Tkinter that allows users to search for news articles using the [NewsAPI](https://newsapi.org/). It enables users to enter a search query, fetch related articles, display the results in the application, and save the results to a text file.

## Features

- Search news articles based on any keyword.
- Display the titles and URLs of the top related articles.
- Save the search results to a `.txt` file.
- Clear the input and results area easily.

## Getting Started

To use this application, you need to have Python installed on your machine, along with the `requests` and `tkinter` libraries.

### Prerequisites

1. Python 3.x installed on your machine.
2. The `requests` library for API requests.
   - If not installed, you can install it by running:

   ```bash
   pip install requests
   ```
   
## NewsAPI Key
To fetch news articles, you will need to sign up for an API key from NewsAPI.

Create an account at NewsAPI.
Retrieve your API key.
Replace the API_KEY variable in the script with your actual API key.

### Running the Script

Use the following format to run the script:

python news_getter.py <category / query>

For example:

python news_getter.py "business"

python news_getter.py "Cristiano Ronaldo"

The script will output the titles and URLs of the top news articles related to the provided category or query.

## How to Use
1. Clone the repository or download the script.

2. Open the Python script file and replace the placeholder API_KEY with your actual NewsAPI key.

3. Run the script using Python:
4. 
```bash
python news_fetcher.py
```

4. A GUI window will appear with the following options:

- Enter a search query in the input field.
- Click the "Search" button to fetch news articles.
- The titles and URLs of the related articles will appear in the results area.
- You can save the results to a text file by clicking "Save to Text".
- Click "Clear" to clear the input and the results.


## Saving Results
The "Save to Text" button will open a file dialog that allows you to save the results in a .txt file. Choose the desired location to save the results.

## Example Usage

- Enter a query such as "technology", "sports", or "Elon Musk" in the search field.
- Press the "Search" button, and relevant news articles will be displayed.

## Code Overview
get_articles_by_query(query)
This function takes a search query as input, sends a request to the NewsAPI, and returns the top articles related to the query.

## _get_articles(params)
Helper function that handles the API request and parses the results.

## search_news()
Fetches articles based on the user’s input from the search field.

## save_to_text()
Allows users to save the fetched results to a text file.

## clear_all()
Clears the search input and the results display.

## Notes
- The application uses the everything endpoint of the NewsAPI, which searches for articles containing the specified query.
- The API key is required for authenticating requests to NewsAPI. Keep it confidential and secure.

## License

This project is released under an open-source license. Use it for personal or educational purposes only, and make sure to follow NewsAPI's terms of service.
