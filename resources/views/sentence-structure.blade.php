<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sentence Structure Visualizer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-gradient-to-br from-yellow-100 to-white min-h-screen flex items-center justify-center p-6 font-sans">

  <!-- Container -->
  <div class="w-full max-w-4xl space-y-10">
    <h1 class="text-3xl sm:text-4xl font-bold text-center text-indigo-800">Sentence Structure Explorer</h1>

    <!-- Sentence Example -->
    <div class="bg-white shadow-lg rounded-2xl p-6 space-y-4">
      <h2 class="text-xl font-semibold text-gray-800">Contoh: <span class="text-indigo-600">She reads books every night.</span></h2>

      <div class="text-lg space-x-2">
        <span class="inline-block px-3 py-1 rounded-xl bg-yellow-200 font-semibold" id="subject">She</span>
        <span class="inline-block px-3 py-1 rounded-xl bg-green-200 font-semibold" id="verb">reads</span>
        <span class="inline-block px-3 py-1 rounded-xl bg-blue-200 font-semibold" id="object">books</span>
        <span class="inline-block px-3 py-1 rounded-xl bg-pink-200 font-semibold" id="info">every night</span>
      </div>

      <div class="mt-4 space-y-2">
        <p class="text-sm text-gray-700" id="stepText">Klik tombol untuk mulai menjelajahi struktur kalimat.</p>
        <button onclick="nextStep()" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-lg transition">Lanjut</button>
      </div>
    </div>
  </div>

  <script>
    const steps = [
      {
        element: "#subject",
        text: "👉 <strong>Subject:</strong> 'She' adalah pelaku dalam kalimat. Subject biasanya berupa noun atau pronoun."
      },
      {
        element: "#verb",
        text: "👉 <strong>Verb:</strong> 'reads' menunjukkan aksi yang dilakukan subject."
      },
      {
        element: "#object",
        text: "👉 <strong>Object:</strong> 'books' menerima aksi dari verb."
      },
      {
        element: "#info",
        text: "👉 <strong>Keterangan waktu:</strong> 'every night' memberikan informasi tambahan kapan aksi terjadi."
      },
      {
        element: null,
        text: "✅ Selesai! Sekarang kamu tahu susunan <strong>Subject + Verb + Object</strong> secara bertahap."
      }
    ];

    let stepIndex = 0;

    function nextStep() {
      if (stepIndex < steps.length) {
        const current = steps[stepIndex];

        // Reset semua dulu
        document.querySelectorAll('span').forEach(el => gsap.to(el, { scale: 1, backgroundColor: "", duration: 0.2 }));

        // Kalau ada elemen ditarget
        if (current.element) {
          const el = document.querySelector(current.element);
          gsap.to(el, {
            scale: 1.2,
            backgroundColor: "#facc15", // yellow-400
            duration: 0.4,
            ease: "back.out(1.7)"
          });
        }

        document.getElementById('stepText').innerHTML = current.text;
        stepIndex++;
      } else {
        stepIndex = 0;
        nextStep(); // mulai ulang
      }
    }
  </script>
</body>
</html>
