
### **Consegna: Gestione Dati Campionato Automobilistico**

Si deve realizzare un'applicazione (front-end e back-end) per la gestione dei dati relativi a un campionato automobilistico. L'applicazione deve essere in grado di:

1. **Registrare i dati richiesti per l'iscrizione al campionato**, includendo:
   - Piloti: nome, cognome, nazionalità, numero di gara.
   - Case automobilistiche: nome e colore della livrea.
   - Risultati delle gare: ordine di arrivo, tempo più veloce, e posizione di ogni pilota.
   
2. **Aggiornare e visualizzare le classifiche generali**:
   - Classifica per pilota, aggiornata in tempo reale.
   - Classifica per squadra (casa automobilistica), anch'essa aggiornata durante il campionato.

3. **Visualizzare i risultati di una gara specifica**, includendo:
   - Ordine di arrivo dei piloti.
   - Tempo più veloce registrato in gara.

---

### **Requisiti dell'applicazione**:

#### **Front-end:**
L'interfaccia utente dovrà permettere di:
   - **Inserire i dati relativi ai piloti, alle case automobilistiche, e ai risultati delle gare**.
   - **Visualizzare le classifiche generali** (per pilota e per squadra), con aggiornamenti in tempo reale.
   - **Consultare i risultati di una determinata gara**, con i dettagli sulle posizioni e i tempi.

#### **Back-end:**
L'infrastruttura del sistema deve consentire di:
   - **Gestire il database** contenente i dati di piloti, case automobilistiche, risultati gare e classifiche.
   - **Eseguire operazioni di aggiornamento** delle classifiche in base ai risultati delle gare.
   - **Elaborare i risultati delle gare** e calcolare automaticamente le posizioni e i tempi per ciascun pilota.

---

### **Nota Importante:**
- Un **pilota** può correre solo per una determinata casa automobilistica nell'arco del campionato.
- Ogni **casa automobilistica** può avere più piloti che gareggiano per la stessa squadra.
  
---

### **Strumenti da utilizzare**:

- **Schema concettuale**: Deve essere realizzato con **DrawIO** (drawio.com).
- **Schema relazionale**: Deve essere presentato come **screenshot** ottenuto tramite **DBeaver**.

---

### **Dettagli tecnici richiesti**:
1. **Schema concettuale (DrawIO)**: 
   - Rappresentare le entità principali (Pilota, Casa Automobilistica, Gara, Classifica Generale, Classifica Squadra) e le loro relazioni.
   
2. **Schema relazionale (DBeaver)**: 
   - Creare il database relazionale con tabelle e relazioni tra le entità descritte nel diagramma concettuale.
   
3. **Funzionalità principali dell'applicazione**:
   - **Inserimento dati**: Form per aggiungere piloti, case automobilistiche e gare.
   - **Visualizzazione classifiche**: Pagine per visualizzare la classifica piloti e la classifica squadre.
   - **Visualizzazione risultati gara**: Selezione di una gara per visualizzarne i risultati e l'ordine di arrivo.

---

### **Requisiti aggiuntivi**:
- La gestione delle classifiche deve essere dinamica, ovvero deve aggiornarsi automaticamente dopo ogni gara.
- I dati relativi a piloti e case automobilistiche devono essere facilmente modificabili, qualora necessario.

--- 

### **Consegna Finale**:
- **Diagramma concettuale** creato con DrawIO.
- **Schema relazionale** presentato come screenshot da DBeaver.
- **Codice dell'applicazione** (front-end e back-end) per la gestione dei dati e delle classifiche.

---

Assicurati di seguire questi passaggi per creare un'applicazione completa ed efficiente. Buon lavoro!
