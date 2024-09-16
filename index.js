let books = [
  {
    title: "The Hobbit",
    author: "J.R.R Tolkien",
    maxPages: 200,
    onPage: 60,
  },
  {
    title: "Harry Potter",
    author: "J.K Rowling",
    maxPages: 250,
    onPage: 150,
  },
  {
    title: "50 Shades of Grey",
    author: "E. L. James",
    maxPages: 150,
    onPage: 75,
  },
  {
    title: "Atomic Habits",
    author: "James Clear",
    maxPages: 290,
    onPage: 290,
  },
  {
    title: "Rich Dad Poor Dad",
    author: "Robert Kiyosaki",
    maxPages: 390,
    onPage: 390,
  },
];

function renderBookList() {
  const bookList = document.getElementById("bookList");
  bookList.innerHTML = "";
  books.forEach((book) => {
    const listItem = document.createElement("p");
    listItem.textContent = ` • ${book.title} by ${book.author}`;
    bookList.appendChild(listItem);
  });
  const lineBreak = document.createElement("br");
  bookList.appendChild(lineBreak);

  const status = document.createElement("h2");
  status.textContent = `Book Status`;
  bookList.appendChild(status);
}

renderBookList();

function renderBookTable() {
  const tableBody = document.getElementById("bookTable");
  tableBody.innerHTML = "";
  books.forEach((book) => {
    const row = document.createElement("tr");
    row.innerHTML = `
    <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.onPage}</td>
    <td>${book.maxPages}</td>
    <td>
    <div class="progress-bar">
        <div class="progress" style="width: ${
          (book.onPage / book.maxPages) * 100
        }%"></div>
        </div>
    </td>`;
    tableBody.appendChild(row);
  });
}

renderBookTable();

function addBook(event) {
  event.preventDefault();
  const title = document.getElementById("title").value;
  const author = document.getElementById("author").value;
  const onPage = parseInt(document.getElementById("onPage").value);
  const maxPages = parseInt(document.getElementById("maxPages").value);
  books.push({ title, author, onPage, maxPages });
  renderBookList();
  renderBookTable();
  readStatus();
  document.getElementById("addBookForm").reset();
}

document.getElementById("addBookForm").addEventListener("submit", addBook);

function readStatus() {
  books.forEach((book) => {
    const statusElement = document.createElement("P");
    const bookList = document.getElementById("bookList");

    if (book.maxPages === book.onPage) {
      statusElement.textContent = `• You already have read ${book.title} by ${book.author}`;
      statusElement.classList.add("green");
    } else {
      statusElement.textContent = `• You still need to read ${book.title} by ${book.author}`;
      statusElement.classList.add("red");
    }
    bookList.appendChild(statusElement);
  });
}

readStatus();
