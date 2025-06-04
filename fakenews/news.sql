CREATE DATABASE IF NOT EXISTS fakenews;
use fakenews; 
CREATE TABLE if not exists  titoli (
    id INT PRIMARY KEY,
    testo TEXT NOT NULL,
    gruppo INT NOT NULL
);

CREATE TABLE if not exists contenuti (
    id INT PRIMARY KEY,
    testo TEXT NOT NULL,
    gruppo INT NOT NULL
);

CREATE TABLE if not exists immagini (
    id INT PRIMARY KEY,
    url TEXT NOT NULL,
    gruppo INT NOT NULL
);

CREATE TABLE if not exists date (
    id INT PRIMARY KEY,
    data DATE NOT NULL,
    gruppo INT NOT NULL
);
CREATE TABLE if not exists utenti (
    id INT PRIMARY KEY,
    username varchar(50) NOT NULL,
    email varchar(60) not null, 
    password varchar(255) NOT NULL,
    admin boolean not null default false
);
-- Inserimento dati nella tabella Titoli
INSERT INTO titoli (id, testo, gruppo) VALUES
(1, 'Scoperta una cura miracolosa per il cancro', 3),
(2, 'Un meteorite minaccia la Terra', 1),
(3, 'Nuove prove confermano l’esistenza degli UFO', 2),
(4, 'Il governo nasconde la verità sugli alieni', 2),
(5, 'I cibi geneticamente modificati sono pericolosi', 3),
(6, 'Un misterioso virus è stato creato in laboratorio', 3),
(7, 'Scienziati confermano l’esistenza di una razza aliena', 2),
(8, 'Il cambiamento climatico è una truffa', 4),
(9, 'Il 5G causa gravi malattie', 4),
(10, 'Le scie chimiche sono una realtà', 4),
(11, 'Le autorità stanno nascondendo l’esistenza di una cura universale', 5),
(12, 'Vaccini pericolosi: lo scandalo mondiale', 5),
(13, 'Il mondo finirà nel 2027 secondo le previsioni antiche', 6),
(14, 'La Terra è piatta: le prove', 6),
(15, 'Il governo sta controllando le menti attraverso i social media', 7),
(16, 'I controlli sul cibo sono manipolati da grandi aziende', 3),
(17, 'La verità sugli esseri umani creati in laboratorio', 2),
(18, 'Ci sono basi segrete sulla Luna', 8),
(19, 'Il controllo del meteo è nelle mani delle multinazionali', 9),
(20, 'L’industria della salute sta occultando cure alternative', 3);

-- Inserimento dati nella tabella Contenuti
INSERT INTO contenuti (id, testo, gruppo) VALUES
(1, 'Un misterioso vaccino viene distribuito segretamente da grandi case farmaceutiche.\nMolti sospettano che il vaccino sia stato progettato non per curare, ma per controllare la popolazione.\nAlcuni teorici sostengono che le multinazionali siano coinvolte in un piano globale per impiantare microchip nei cittadini attraverso queste iniezioni.', 1),
(2, 'Secondo i più recenti studi, un meteorite di enormi dimensioni è diretto verso il nostro pianeta.\nLe autorità sarebbero a conoscenza del pericolo imminente ma non stanno avvisando la popolazione per evitare il panico.\nGli scienziati sono divisi su quando questo evento catastrofico potrebbe accadere, ma tutti sono concordi sul fatto che sarebbe un impatto devastante.', 1),
(3, 'Gli scienziati finalmente hanno trovato prove inconfutabili di visite extraterrestri.\nUn team di ricercatori ha rivelato documenti segreti che dimostrano come il governo mondiale stia occultando la verità sugli alieni da decenni.\nTestimonianze di ex militari confermano che gli extraterrestri hanno visitato la Terra più volte e che i governi stanno cercando di coprire queste informazioni.', 2),
(4, 'Fonti anonime del governo hanno rivelato che le navi spaziali sono già in orbita attorno alla Terra, pronte a fare il loro ritorno.\nI documenti trapelati suggeriscono che i governi mondiali siano in contatto con razze extraterrestri da molti anni e che abbiano collaborato segretamente a progetti di ricerca tecnologica avanzata.', 2),
(5, 'Le tecniche moderne di modificazione genetica sono molto più dannose di quanto si pensasse.\nI nuovi studi rivelano che la manipolazione genetica non solo influisce sull’aspetto fisico, ma potrebbe alterare in modo permanente il DNA umano, creando generazioni future con malattie sconosciute.\nI governi avrebbero nascosto questi studi per non perdere il controllo sul mercato delle biotecnologie.', 3),
(6, 'Il virus, che ha origini misteriose, potrebbe essere la causa di una pandemia globale.\nAlcuni ricercatori hanno ipotizzato che il virus sia stato creato intenzionalmente in laboratorio come parte di un progetto segreto per ridurre la popolazione mondiale.\nL’epidemia sarebbe stata poi deliberatamente diffusa attraverso viaggi internazionali per generare il caos e giustificare il controllo sociale.', 3),
(7, 'Recenti test hanno confermato che esseri extraterrestri sono stati trovati sulla Terra.\nUn team di archeologi ha scoperto antichi artefatti che suggeriscono la presenza di forme di vita aliene in epoche preistoriche.\nLe scoperte sono state ignorate dai media mainstream, che sono accusati di nascondere la verità per evitare di scatenare una crisi globale.', 2),
(8, 'Le temperature globali sono manipolate da gruppi che vogliono ottenere enormi profitti.\nGli scienziati hanno scoperto che molti degli studi sul cambiamento climatico sono stati alterati per favorire le grandi aziende energetiche che traggono profitto dalla paura del riscaldamento globale.\nSecondo alcuni esperti, i dati sono manipolati per far passare leggi che arricchiscono poche grandi multinazionali.', 4),
(9, 'Diverse ricerche mediche hanno mostrato un legame tra l’esposizione al 5G e malattie gravi.\nGli esperti avvertono che le onde radio emesse dalla tecnologia 5G potrebbero causare danni permanenti alle cellule umane, portando a malformazioni genetiche e malattie neurologiche.\nIl governo avrebbe ridotto al minimo il rischio per non ostacolare l’espansione della rete 5G.', 4),
(10, 'Le scie lasciate dagli aerei non sono normali, ma sostanze chimiche rilasciate intenzionalmente.\nSecondo numerosi esperti, le scie chimiche sono parte di un programma segreto di geoingegneria, in cui i governi usano aeroplani per disperdere sostanze nell’atmosfera per manipolare il clima, controllare la popolazione o persino sperimentare nuovi armamenti atmosferici.', 4),
(11, 'Un ricercatore ha affermato che la cura universale contro il cancro esiste da anni, ma è nascosta.\nSecondo la denuncia di un ex-scienziato, una cura rivoluzionaria è stata sviluppata in segreto da un laboratorio privato, ma le case farmaceutiche sono intervenute per sopprimere la sua diffusione, in quanto metterebbe a rischio i profitti miliardari derivanti dai trattamenti oncologici tradizionali.', 5),
(12, 'Numerosi studi segreti dimostrano i rischi dei vaccini, ma le case farmaceutiche li occultano.\nEsperti indipendenti hanno rivelato che la maggior parte dei vaccini contiene sostanze pericolose, come metalli pesanti e tossine, che non solo causano effetti collaterali gravi, ma potrebbero anche essere utilizzati per manipolare il comportamento umano attraverso la tecnologia nanometrica.', 5),
(13, 'Le antiche profezie predicono che la fine del mondo arriverà nel 2027, come rivelato da alcuni esperti.\nI calcoli astronomici basati su scritture antiche suggeriscono che il 2027 segnerà un periodo di grandi cambiamenti globali, dove la Terra sarà colpita da eventi cataclismici e l’umanità dovrà affrontare una rivelazione cosmica che metterà in discussione tutte le credenze religiose e scientifiche.', 6),
(14, 'Esistono prove tangibili che la Terra è piatta e che la scienza tradizionale lo nasconde.\nUn gruppo di scienziati dissidenti ha svelato documenti che dimostrano che la Terra non è un globo, ma piatta, e che la NASA ha nascosto la verità per centinaia di anni.\nSecondo loro, tutte le prove scientifiche che suggeriscono il contrario sono manipolate dalla NASA e dalle organizzazioni internazionali.', 6),
(15, 'Teorie scientifiche suggeriscono che il governo stia controllando le menti attraverso i social media.\nStudi psicologici rivelano che i social network sono stati progettati per influenzare il comportamento e la psiche degli utenti.\nIl governo e le grandi aziende tecnologiche collaborerebbero per monitorare e manipolare le masse, cercando di controllare le opinioni politiche e le scelte di vita delle persone.', 7),
(16, 'Le grandi aziende alimentari stanno manipolando il cibo per ottenere un controllo maggiore sulla salute pubblica.\nLa manipolazione genetica degli alimenti è solo la punta dell’iceberg: le aziende alimentari stanno progettando cibi che possano indurre dipendenza, aumentando la domanda di prodotti nocivi per la salute, come zuccheri e grassi.', 3),
(17, 'Sembra che ci siano esperimenti segreti che coinvolgono la creazione di esseri umani in laboratorio.\nAlcuni ricercatori hanno trovato prove che suggeriscono che scienziati privati stiano tentando di creare esseri umani artificiali utilizzando l’ingegneria genetica.\nQuesti esperimenti sarebbero stati finanziati da potenti entità governative e militari.', 2),
(18, 'Secondo esperti indipendenti, ci sono basi sulla Luna che il governo non vuole che scoprano.\n Recenti scoperte scientifiche suggeriscono che la Luna potrebbe ospitare strutture costruite da una civiltà antica, forse extraterrestre.\n I governi mondiali sembrano avere informazioni riservate riguardo a queste basi e avrebbero già avviato missioni per esplorarle in segreto.', 8),
(19, 'La manipolazione del meteo è un’arma nelle mani delle multinazionali per scopi economici./nAlcuni esperti affermano che le aziende stanno sfruttando la geoingegneria per influenzare le condizioni climatiche, creando eventi estremi come uragani e siccità per controllare l’offerta agricola e aumentare i profitti delle industrie alimentari e energetiche.', 9),
(20, 'Le cure alternative stanno venendo soppiantate dai trattamenti convenzionali per motivi economici./nMolti studi indicano che cure naturali e terapie alternative potrebbero curare una vasta gamma di malattie, ma le grandi industrie farmaceutiche cercano di mettere da parte queste soluzioni per mantenere il dominio sui trattamenti più costosi e dannosi.', 5);


-- Inserimento dati nella tabella Immagini
INSERT INTO immagini (id, url, gruppo) VALUES
(1, 'immagine.jpg', 1),
(2, 'immagine2.jpg', 1),
(3, 'immagine3.jpg', 2),
(4, 'immagine4.jpg', 2),
(5, 'immagine5.jpg', 3),
(6, 'immagine6.jpg', 3),
(7, 'immagine7.jpg', 2),
(8, 'immagine8.jpg', 4),
(9, 'immagine9.jpg', 4),
(10, 'immagine10.jpg', 4),
(11, 'immagine11.jpg', 5),
(12, 'immagine12.jpg', 5),
(13, 'immagine13.jpg', 6),
(14, 'immagine14.jpg', 6),
(15, 'immagine15.jpg', 7),
(16, 'immagine16.jpg', 3),
(17, 'immagine17.jpg', 2),
(18, 'immagine18.jpg', 8),
(19, 'immagine19.jpg', 9),
(20, 'immagine20.jpg', 5);

-- Inserimento dati nella tabella Data
INSERT INTO date (id, data, gruppo) VALUES
(1, '2025-05-01', 1),
(2, '2025-05-02', 1),
(3, '2025-05-03', 2),
(4, '2025-05-04', 2),
(5, '2025-05-05', 3),
(6, '2025-05-06', 3),
(7, '2025-05-07', 2),
(8, '2025-05-08', 4),
(9, '2025-05-09', 4),
(10, '2025-05-10', 4),
(11, '2025-05-11', 5),
(12, '2025-05-12', 5),
(13, '2025-05-13', 6),
(14, '2025-05-14', 6),
(15, '2025-05-15', 7),
(16, '2025-05-16', 3),
(17, '2025-05-17', 2),
(18, '2025-05-18', 8),
(19, '2025-05-19', 9),
(20, '2025-05-20', 5);

