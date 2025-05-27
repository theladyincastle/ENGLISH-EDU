<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Parts of Speech Visualizer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-gradient-to-br from-indigo-200 to-white min-h-screen flex items-center justify-center p-8 font-sans">

  <!-- Grid of Cards -->
  <div class="grid grid-cols-2 md:grid-cols-4 gap-6 w-full max-w-5xl">
    <div class="card bg-indigo-500 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Noun">Noun</div>
    <div class="card bg-pink-500 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Verb">Verb</div>
    <div class="card bg-yellow-400 text-black p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Adjective">Adjective</div>
    <div class="card bg-green-400 text-black p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Adverb">Adverb</div>
    <div class="card bg-purple-500 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Pronoun">Pronoun</div>
    <div class="card bg-red-400 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Preposition">Preposition</div>
    <div class="card bg-blue-500 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Conjunction">Conjunction</div>
    <div class="card bg-gray-600 text-white p-6 rounded-2xl text-center shadow-lg cursor-pointer" data-type="Interjection">Interjection</div>
  </div>

  <!-- Pop-up -->
  <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-xl w-[90%] max-w-lg relative">
      <button onclick="closePopup()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
      <h2 class="text-2xl font-bold mb-4" id="popup-title">Title</h2>
      <p class="mb-3 text-gray-800" id="popup-sentence">Example sentence with <span class="bg-yellow-200">highlight</span>.</p>
      <h3 class="text-lg font-semibold mt-4 mb-2">Jenis / Catatan:</h3>
      <ul class="list-disc list-inside text-sm text-gray-700" id="popup-note">
        <li>Example 1</li>
        <li>Example 2</li>
      </ul>
    </div>
  </div>

  <script>
    // GSAP animation
    gsap.from(".card", {
      y: 100,
      opacity: 0,
      duration: 1,
      stagger: 0.2,
      ease: "back.out(1.7)"
    });

    const data = {
      "Noun": {
        sentence: 'My <span class="bg-yellow-200 font-semibold">cat</span> sleeps on the <span class="bg-yellow-200 font-semibold">sofa</span> every afternoon.',
        note: ['Common Noun: cat, dog', 'Proper Noun: Jakarta, Alice', 'Abstract Noun: love, happiness', 'Collective Noun: team, family']
      },
      "Verb": {
        sentence: 'She <span class="bg-yellow-200 font-semibold">runs</span> to school every morning.',
        note: ['Action Verbs: run, eat', 'State Verbs: know, like', 'Modal Verbs: can, must']
      },
      "Adjective": {
        sentence: 'The <span class="bg-yellow-200 font-semibold">beautiful</span> garden is full of <span class="bg-yellow-200 font-semibold">colorful</span> flowers.',
        note: ['Descriptive: beautiful, red', 'Quantitative: many, few', 'Demonstrative: this, those']
      },
      "Adverb": {
        sentence: 'He speaks <span class="bg-yellow-200 font-semibold">clearly</span> and <span class="bg-yellow-200 font-semibold">politely</span>.',
        note: ['Manner: quickly, slowly', 'Time: now, later', 'Frequency: always, never']
      },
      "Pronoun": {
        sentence: '<span class="bg-yellow-200 font-semibold">She</span> gave <span class="bg-yellow-200 font-semibold">him</span> the book.',
        note: ['Personal: I, you, he', 'Possessive: my, your', 'Reflexive: myself, yourself']
      },
      "Preposition": {
        sentence: 'The book is <span class="bg-yellow-200 font-semibold">on</span> the table <span class="bg-yellow-200 font-semibold">near</span> the window.',
        note: ['Place: in, on, under', 'Time: before, after', 'Direction: to, from']
      },
      "Conjunction": {
        sentence: 'I wanted to go, <span class="bg-yellow-200 font-semibold">but</span> I was too tired.',
        note: ['Coordinating: and, but, or', 'Subordinating: because, although', 'Correlative: either...or']
      },
      "Interjection": {
        sentence: '<span class="bg-yellow-200 font-semibold">Wow!</span> That’s amazing!',
        note: ['Wow!, Oh!, Hey!, Oops!']
      }
    };

    const cards = document.querySelectorAll('.card');
    const popup = document.getElementById('popup');
    const popupTitle = document.getElementById('popup-title');
    const popupSentence = document.getElementById('popup-sentence');
    const popupNote = document.getElementById('popup-note');

    cards.forEach(card => {
      card.addEventListener('click', () => {
        const type = card.getAttribute('data-type');
        popupTitle.innerText = type;
        popupSentence.innerHTML = data[type].sentence;
        popupNote.innerHTML = '';
        data[type].note.forEach(n => {
          const li = document.createElement('li');
          li.textContent = n;
          popupNote.appendChild(li);
        });
        popup.classList.remove('hidden');
        gsap.from("#popup .bg-white", { scale: 0.7, opacity: 0, duration: 0.3, ease: "back.out(1.7)" });
      });
    });

    function closePopup() {
      popup.classList.add('hidden');
    }
  </script>
</body>
</html>
