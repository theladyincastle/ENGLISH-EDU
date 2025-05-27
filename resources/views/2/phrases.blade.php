<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Phrases Visualizer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 to-white min-h-screen flex items-center justify-center p-6 font-sans">

  <div class="w-full max-w-4xl space-y-10">
    <h1 class="text-3xl sm:text-4xl font-bold text-center text-purple-800">Phrases Explorer</h1>

    <div class="bg-white shadow-lg rounded-2xl p-6 space-y-4">
      <h2 class="text-xl font-semibold text-gray-800">
        Contoh kalimat: <span>She sat <span id="prepPhrase" class="rounded px-2 py-1 bg-yellow-200 font-semibold">by the window</span>.</span>
      </h2>

      <div class="mt-4 space-y-2">
        <p class="text-sm text-gray-700" id="stepText">Klik tombol untuk mulai menjelajahi phrase.</p>
        <button onclick="nextStep()" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg transition">Lanjut</button>
      </div>
    </div>
  </div>

  <script>
    const steps = [
      {
        element: null,
        text: "👉 Phrases adalah kelompok kata yang bekerja sebagai satu unit dalam kalimat, tapi tidak punya subject dan verb."
      },
      {
        element: "#prepPhrase",
        text: "👉 Contoh: <strong>by the window</strong> adalah <em>Prepositional Phrase</em> yang menerangkan tempat."
      },
      {
        element: "#prepPhrase",
        text: "👉 Phrase ini tidak bisa berdiri sendiri sebagai kalimat karena tidak lengkap subjek dan kata kerjanya."
      },
      {
        element: null,
        text: "✅ Kamu sudah memahami apa itu phrase dan contoh sederhana prepositional phrase."
      }
    ];

    let stepIndex = 0;

    function nextStep() {
      if (stepIndex < steps.length) {
        const current = steps[stepIndex];

        // Reset highlight semua dulu
        document.querySelectorAll('span').forEach(el => gsap.to(el, { scale: 1, backgroundColor: "", duration: 0.2 }));

        if (current.element) {
          const el = document.querySelector(current.element);
          gsap.to(el, {
            scale: 1.2,
            backgroundColor: "#fde68a", // yellow-300
            duration: 0.4,
            ease: "back.out(1.7)"
          });
        }

        document.getElementById('stepText').innerHTML = current.text;
        stepIndex++;
      } else {
        stepIndex = 0;
        nextStep(); // restart biar bisa diulang
      }
    }
  </script>
</body>
</html>
