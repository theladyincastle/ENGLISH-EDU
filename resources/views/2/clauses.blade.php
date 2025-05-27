<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Clauses Visualizer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body class="bg-gradient-to-br from-green-100 to-white min-h-screen flex items-center justify-center p-6 font-sans">

  <div class="w-full max-w-4xl space-y-10">
    <h1 class="text-3xl sm:text-4xl font-bold text-center text-green-800">Clauses Explorer</h1>

    <div class="bg-white shadow-lg rounded-2xl p-6 space-y-4">
      <h2 class="text-xl font-semibold text-gray-800">Contoh: <span class="text-green-600">I know <span id="subClause" class="rounded px-2 py-1 bg-yellow-200 font-semibold">that she is tired</span>.</span></h2>

      <div class="mt-4 space-y-2">
        <p class="text-sm text-gray-700" id="stepText">Klik tombol untuk mulai menjelajahi klausa.</p>
        <button onclick="nextStep()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">Lanjut</button>
      </div>
    </div>
  </div>

  <script>
    const steps = [
      {
        element: null,
        text: "👉 Kalimat ini punya dua bagian utama: <strong>Main Clause</strong> dan <strong>Subordinate Clause</strong>."
      },
      {
        element: null,
        text: "👉 Main Clause: 'I know' adalah klausa utama yang bisa berdiri sendiri."
      },
      {
        element: "#subClause",
        text: "👉 Subordinate Clause: <strong>that she is tired</strong> tidak bisa berdiri sendiri dan bergantung pada klausa utama."
      },
      {
        element: "#subClause",
        text: "👉 Subordinate clause ini biasanya diawali dengan kata penghubung seperti 'that', 'because', 'if', dll."
      },
      {
        element: null,
        text: "✅ Selesai! Kamu sekarang tahu struktur klausa dasar dalam kalimat."
      }
    ];

    let stepIndex = 0;

    function nextStep() {
      if (stepIndex < steps.length) {
        const current = steps[stepIndex];

        // Reset semua dulu
        if(current.element) {
          document.querySelectorAll('span').forEach(el => gsap.to(el, { scale: 1, backgroundColor: "", duration: 0.2 }));
          const el = document.querySelector(current.element);
          gsap.to(el, {
            scale: 1.2,
            backgroundColor: "#facc15", // yellow highlight
            duration: 0.4,
            ease: "back.out(1.7)"
          });
        } else {
          // kalau ga ada elemen highlight, reset semua
          document.querySelectorAll('span').forEach(el => gsap.to(el, { scale: 1, backgroundColor: "", duration: 0.2 }));
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
