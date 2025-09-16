## Project Overview

**PlayadiceWeb** is a web-based management system designed for the needs of the association "[Playadice](https://www.instagram.com/playadiceofficial?igsh=MW9xcjhleWpqc3Nibw==)" of which I am a board member.

**Playadice** is a board game and role-playing game association that promotes social inclusion and the development of mental skills through play.

During our firsts years of work, we have noticed that we needed a software for digitalizing some informations (for example data for associate members, games we have in collection and the calendar with our events), and from this idea that this software was born.


The main features of PlayadiceWeb include:
- **Games Management:** Store and catalog board games, including details of those games and also the possibility for associate member to review them.
- **People Management:** Register, update, and organize members or participants of the association.
- **Events Management:** Schedule and track events, including attendance and participants.

Project for the "Web Programming" Exam at Univaq. As a request of the Professor, we have not used any Framework and we have coded from scratch every single aspect of the Full-stack development (From the UI to the database), using the MVC architectural design pattern(adding a Layer called `Foundation layer` which has the responsability to generate the queries and comunicate with the Database) with an OOP paradigm.

## Getting Started

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Puaison/PlayadiceWeb.git
   cd PlayadiceWeb
   ```
2. **Install dependencies:**  
   *(The setup instructions depend on the technology stack used. Please refer to any included documentation or installation scripts.)*

3. **Run the application:**  
   *(Running instructions will depend on the language and framework. Typical commands could include starting a development server, e.g., `npm start`, `python manage.py runserver`, or similar.)*

## Features

- Simple web interface for managing games, people, and events
- User authentication and role management (if available)
- Search and filtering capabilities
- Event scheduling and participant tracking
- Developed with web programming best practices

## License

Please refer to the repository and any upstream license for usage and distribution terms.


Installazione
L'applicazione è stata svilupatta in PHP e provata su XAMPP, una piattaforma software che contiene strumenti quali:
•	Server Apache
•	Il DBMS MySQL
•	PHP ( almeno Versione 7.4)
Pertanto l'applicazione dovrà richiedere un'installazione di XAMPP, in particolare la cartella contenente l'applicativo dovrà essere posizionata nella cartella htdocs .E’ possibile raggiungere l'applicazione attraverso l'URL localhost/playadice/ . La prima volta che vi si accede verrà visualizzata una form di installazione, in cui verranno richiesti:
•	nome utente del DBMS
•	password del DBMS
•	nome che si vuole dare al database
Tali informazioni verranno salvati in un file di configurazione, config.inc.php, che sarà utilizzato dallo strato Foundation per comunicare con il dbms.

Inoltre, è disponibile tutta la documentazione completa nella cartella "documentazione". Per il PHPDOC aprire il file index all'interno della suddetta.

