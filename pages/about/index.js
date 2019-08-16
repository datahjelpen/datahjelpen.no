import Head from "next/head";
import styles from "./about.scss";

function Home() {
  return (
    <>
      <Head>
        <title>About</title>
      </Head>
      <div className={styles.example}>About Next.js!</div>
    </>
  );
}

export default Home;
