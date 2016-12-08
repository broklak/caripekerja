<div>
    Hi {{$employer->name}},
    <p>Seorang pekerja bernama {{$worker->name}} melamar ke lowongan pekerjaan {{$job->title}} yang anda posting. </p>
    <p>Anda dapat melihat profil pekerja ini dengan mengklik link berikut <a href="{{route('worker-detail', ['workerId' => $worker->id])}}">Lihat Profil Pekerja</a></p>
    <p>Salam</p>
    <p>Caripekerja.com</p>
</div>