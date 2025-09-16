## Project Overview

**PlayadiceWeb** is a web-based management system designed for the needs of the association "[Playadice](https://www.instagram.com/playadiceofficial?igsh=MW9xcjhleWpqc3Nibw==)" of which I am a board member.

**Playadice** is a board game and role-playing game association that promotes social inclusion and the development of mental skills through play.

During our firsts years of work, we have noticed that we needed a software for digitalizing some informations (for example data for associate members, games we have in collection and the calendar with our events), and from this idea that this software was born.


The main features of PlayadiceWeb include:
- **Games Management:** Store and catalog board games, including details of those games and also the possibility for associate member to review them.
- **People Management:** Register, update, and organize members or participants of the association.
- **Events Management:** Schedule and track events, including attendance and participants.

Project for the "Web Programming" Exam at Univaq. As a request of the Professor, we have not used any Framework and we have coded from scratch every single aspect of the Full-stack development (From the UI to the database), using the MVC architectural design pattern(adding a Layer called `Foundation layer` which has the responsability to generate the queries and comunicate with the Database) with an OOP paradigm. Moreover we have also followed the process of software engineering by studying at first the use cases and the scratch of the UI. 

## Getting Started
This app was developed using [XAMPP](https://www.apachefriends.org/it/download.html) version 7.4.3, so it is necessary first to install it with the modules `Server Apache`, `MySQL` and `PHP`.
To install the app run these steps:
1. **Clone the repository in folder xampp/htdocs:**
   ```bash
   git clone https://github.com/Puaison/PlayadiceWeb.git
   ```
2. **Open XAMPP control Panel and start `Server Apache` and `MySQL` modules:**  

3. **Open this link in Browser:** localhost/PlayadiceWeb/. You will see the installation screen
4. **Insert in the form the credential of your DBMS (by default they are 'root' with no password) and give a name to the database**. These informations will be saved in a new configuration file called `config.inc.php` [inserire immagine]
5. After the installation, from now on, by visiting localhost/PlayadiceWeb/, you should see the homepage of the site  [Inserire immagine]

## Features

- Simple web interface for managing games, people, and events
- User authentication and role management (if available)
- Search and filtering capabilities
- Event scheduling and participant tracking
- Developed with web programming best practices

Inoltre, è disponibile tutta la documentazione completa nella cartella "documentazione". Per il PHPDOC aprire il file index all'interno della suddetta.

