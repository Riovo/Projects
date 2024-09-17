import tkinter as tk
from tkinter import scrolledtext, filedialog
import requests

# API Key for NewsAPI (replace with your actual API key)
API_KEY = ""

URL = 'https://newsapi.org/v2/everything'

def get_articles_by_query(query):
    query_parameters = {
        "q": query,         # Search query
        "apiKey": API_KEY,  # API key for authentication
        "language": "en"
    }
    return _get_articles(query_parameters)

def _get_articles(params):
    try:
        response = requests.get(URL, params=params)
        response.raise_for_status()
        json_response = response.json()

        articles = json_response.get('articles', [])
        if not articles:
            return "No articles found."

        results = ""
        for article in articles:
            results += f"{article['title']}\n{article['url']}\n\n"
        return results

    except requests.RequestException as e:
        return f"Error fetching articles: {e}"

def search_news():
    query = entry.get()
    if not query:
        result_text.set("Please enter a search query.")
        return

    result = get_articles_by_query(query)
    result_text.set(result)

def save_to_text():
    result = result_text.get()
    if not result.strip():
        result_text.set("No results to save.")
        return
    
    file_path = filedialog.asksaveasfilename(defaultextension=".txt", filetypes=[("Text files", "*.txt")])
    if file_path:
        with open(file_path, "w") as file:
            file.write(result)
        result_text.set(f"Results saved to {file_path}")

def clear_all():
    entry.delete(0, tk.END)
    results_display.delete(1.0, tk.END)
    result_text.set("")

root = tk.Tk()
root.title("News Fetcher")
root.geometry("800x600") 

main_frame = tk.Frame(root, padx=20, pady=10, bg="#f0f0f0")
main_frame.pack(fill=tk.BOTH, expand=True)

label = tk.Label(main_frame, text="Enter search query:", font=("Arial", 14), bg="#f0f0f0")
label.grid(row=0, column=0, columnspan=3, pady=(0, 10))

entry = tk.Entry(main_frame, width=60, font=("Arial", 12), bg="#ffffff", borderwidth=2, relief="solid")
entry.grid(row=1, column=0, columnspan=3, pady=(0, 10))

search_button = tk.Button(main_frame, text="Search", command=search_news, font=("Arial", 12), bg="#007bff", fg="#ffffff", borderwidth=0, relief="flat")
search_button.grid(row=2, column=0, pady=(0, 10))

save_button = tk.Button(main_frame, text="Save to Text", command=save_to_text, font=("Arial", 12), bg="#28a745", fg="#ffffff", borderwidth=0, relief="flat")
save_button.grid(row=2, column=1, padx=5, pady=(0, 10))

clear_button = tk.Button(main_frame, text="Clear", command=clear_all, font=("Arial", 12), bg="#dc3545", fg="#ffffff", borderwidth=0, relief="flat")
clear_button.grid(row=2, column=2, padx=5, pady=(0, 10))

result_text = tk.StringVar()
results_display = scrolledtext.ScrolledText(main_frame, width=80, height=20, wrap=tk.WORD, font=("Arial", 12), bg="#f9f9f9", borderwidth=2, relief="solid")
results_display.grid(row=3, column=0, columnspan=3, pady=10)

def update_results():
    results_display.delete(1.0, tk.END)
    results_display.insert(tk.END, result_text.get())

result_text.trace("w", lambda name, index, mode: update_results())

root.mainloop()
